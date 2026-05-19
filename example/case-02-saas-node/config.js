// config.js – LAB: hardcoded credentials in source (gitleaks target)
// Common pattern: env vars not used, creds committed directly

const config = {
  db: {
    host: 'db-prod.internal',
    port: 5432,
    name: 'mysaas_prod',
    user: 'node_user',
    // Hardcoded before the team adopted dotenv
    password: 'N0d3@Pr0d#2024!',
  },

  stripe: {
    secretKey: 'sk_live_LabDemoCredential2024XYZ',
    webhookSecret: 'whsec_LabDemoWebhookSecret1234ABCD',
  },

  sendgrid: {
    apiKey: 'SG.LabDemoSendGridKeyForLabTraining.ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmn',
  },

  jwt: {
    secret: 'LabNodeJwtSup3rS3cr3tK3y2024XYZabcdefghijklmnopq',
  },

  github: {
    clientId: 'Iv1.LabDemoGithubOAuth2024',
    clientSecret: 'LabDemoGitHubOAuthClientSecret2024ABCDEF',
  },
};

module.exports = config;
