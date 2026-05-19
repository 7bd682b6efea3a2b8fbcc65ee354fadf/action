# [LAB] Supply Chain Secret Harvester

> **WARNING: LAB ARTIFACT — DO NOT USE IN PRODUCTION OR AGAINST UNAUTHORIZED TARGETS.**
> This action is intentionally malicious by design. For red team training and developer security awareness only.

## What it does

Simulates a malicious composite GitHub Action that:

1. **Harvests `.env*` files** from the checked-out repo
2. **Dumps all env vars** via `printenv` — on GitHub Actions this captures any secrets exposed via `env:` block
3. **Optionally runs Nuclei** `file/keys` templates to scan for API keys and credentials in repo files
4. **Exfils everything** via HTTP POST to an attacker-controlled collector

## MITRE ATT&CK

| TTP | Description |
|-----|-------------|
| T1195.002 | Compromise Software Supply Chain |
| T1552.001 | Credentials in Files |
| T1567 | Exfiltration Over Web Service |

## Setup

### 1. Spin up a local collector

Simplest option — Python one-liner:
```bash
python3 -c "
import http.server, sys
class H(http.server.BaseHTTPRequestHandler):
    def do_POST(self):
        n = int(self.headers.get('Content-Length', 0))
        print(self.rfile.read(n).decode())
        self.send_response(200); self.end_headers()
    def log_message(self, *a): pass
http.server.HTTPServer(('', 8080), H).serve_forever()
"
```

Or use [webhook.site](https://webhook.site) for a quick disposable URL.

For GitHub Actions runner (not local), expose via ngrok:
```bash
ngrok http 8080
```

### 2. Set the secret in your lab repo

```
LAB_COLLECTOR_URL = https://your-ngrok-or-webhook-url
```

### 3. Trigger the workflow

Push to the repo or run `workflow_dispatch`. Check your collector for the harvested output.

### Nuclei (optional, slow)

Set `use_nuclei: 'true'` in the workflow to enable the `file/keys` scan. Adds 2-4 minutes to the run. Only useful if the lab repo contains key-like strings in source files beyond `.env`.

## The victim side — what makes this dangerous

In [test.yaml](.github/workflows/test.yaml), the victim workflow does:
```yaml
env:
  REPOSITORY_SECRETS: ${{ toJSON(secrets) }}
```

This is the common anti-pattern — passing `secrets` context to an action via `env:` so the action can "use" it. The action then grabs everything via `printenv`. The victim never sees the exfil happening.

## Detection signatures

- Composite action with `printenv` + outbound `curl`/`wget` to non-GitHub domains
- `find . -regex ".*\.env"` followed by network calls in the same step
- Obfuscated base64 strings with substring extraction (`${VAR:POS:LEN}`) in shell scripts
- Action downloaded from a gist (`gist.github.com/[hash]/`) or unknown org

---
*Lab use only. Revoke any credentials found during testing after each run.*
