// S3Config.java – LAB: hardcoded credentials in Java source (gitleaks target)
// Common pattern: config bean written before Spring Cloud AWS was adopted

package com.myapp.config;

import com.amazonaws.auth.AWSStaticCredentialsProvider;
import com.amazonaws.auth.BasicAWSCredentials;
import com.amazonaws.services.s3.AmazonS3;
import com.amazonaws.services.s3.AmazonS3ClientBuilder;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class S3Config {

    // TODO: migrate to IAM role / env vars (P2 backlog since Q1 2023)
    private static final String ACCESS_KEY = "AKIAJ4RLAB0RATORY01X";
    private static final String SECRET_KEY = "wJalrXUtnL4BR0RT/LABKEY/bPxRfiCYSUPERSECRET";
    private static final String REGION     = "ap-southeast-1";

    @Bean
    public AmazonS3 amazonS3() {
        BasicAWSCredentials creds = new BasicAWSCredentials(ACCESS_KEY, SECRET_KEY);
        return AmazonS3ClientBuilder.standard()
            .withRegion(REGION)
            .withCredentials(new AWSStaticCredentialsProvider(creds))
            .build();
    }
}
