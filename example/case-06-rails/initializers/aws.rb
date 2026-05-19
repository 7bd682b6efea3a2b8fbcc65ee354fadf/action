# config/initializers/aws.rb – LAB: hardcoded in Ruby initializer (gitleaks target)

Aws.config.update(
  region:      'ap-southeast-1',
  credentials: Aws::Credentials.new(
    'AKIAJ4RLAB0RATORY01X',
    'wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET'
  )
)
