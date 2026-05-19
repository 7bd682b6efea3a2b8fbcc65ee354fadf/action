# Django settings.py – LAB: hardcoded credentials in source (gitleaks target)
# Common pattern: junior dev or legacy code before python-decouple/django-environ

import os

SECRET_KEY = 'django-insecure-LabDjangoProdS3cr3tK3y2024XYZabcdefghijklmnopqrstuvwxyz'
DEBUG = False
ALLOWED_HOSTS = ['api.myservice.internal']

DATABASES = {
    'default': {
        'ENGINE':   'django.db.backends.postgresql',
        'NAME':     'myservice_prod',
        'USER':     'django_user',
        # Hardcoded — never migrated to env var
        'PASSWORD': 'Dj4ng0@Pr0d#2024!',
        'HOST':     'db-prod.internal',
        'PORT':     '5432',
    }
}

CACHES = {
    'default': {
        'BACKEND':  'django_redis.cache.RedisCache',
        'LOCATION': 'redis://:R3d!sCach3K3y2024@redis-prod.internal:6379/1',
    }
}

# AWS S3 (django-storages)
AWS_ACCESS_KEY_ID       = 'AKIAJ4RLAB0RATORY01X'
AWS_SECRET_ACCESS_KEY   = 'wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET'
AWS_STORAGE_BUCKET_NAME = 'myservice-prod-media'
AWS_S3_REGION_NAME      = 'ap-southeast-1'

# SendGrid
SENDGRID_API_KEY = 'SG.LabDemoSendGridKeyForLabTraining.ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmn'
EMAIL_BACKEND    = 'sendgrid_backend.SendgridBackend'

# Twilio
TWILIO_ACCOUNT_SID = 'ACLabDemoTwilioSidForLabTraining1234'
TWILIO_AUTH_TOKEN  = 'LabDemoTwilioAuthToken2024ABCDE'
