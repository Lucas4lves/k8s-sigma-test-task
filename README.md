# Devops Engineer @Sigma Software - Test Task on Kubernetes

## Directory's Contents
* defs: resource definitions for MySQL database, Wordpress and Nginx deployments:
```
.
├── defs
│   ├── mysql-deployment.yml
│   ├── nginx.yml
│   └── wp-deployment.yml
```
* helm: templates for each workload:
```
helm
├── mysql
│   ├── Chart.yaml
│   ├── values.yaml
│   ├── templates/
│       ├── deployment.yaml, hpa.yaml, ingress.yaml, pvc.yaml, serviceaccount.yaml, service.yaml
│       ├── _helpers.tpl, NOTES.txt
│       ├── tests/test-connection.yaml
├── nginx
│   ├── Chart.yaml
│   ├── values.yaml
│   ├── templates/
│       ├── configmaps.yaml, deployment.yaml, hpa.yaml, ingress.yaml, serviceaccount.yaml, service.yaml
│       ├── _helpers.tpl, NOTES.txt
│       ├── tests/test-connection.yaml
└── wp
    ├── Chart.yaml
    ├── values.yaml
    ├── templates/
        ├── deployment.yaml, hpa.yaml, ingress.yaml, pvc.yaml, serviceaccount.yaml, service.yaml
        ├── _helpers.tpl, NOTES.txt
        ├── tests/test-connection.yaml
```
* docker: a customized docker image for wordpress
```
docker/
└── wordpress-custom-image
    ├── Dockerfile
    └── wp-config.php
```
* rbac: cluster roles for kinds of users
```
rbac/
├── developer-crb.yml
├── developer-cr.yml
├── infra-admin-crb.yml
└── infra-admin-cr.yml
```
