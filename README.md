[![pipeline status](https://git.wayarmy.net/devops/demo/badges/master/pipeline.svg)](https://git.wayarmy.net/devops/demo/commits/master)

[![coverage report](https://git.wayarmy.net/devops/demo/badges/master/coverage.svg)](https://git.wayarmy.net/devops/demo/commits/master)

# DevOps Demo

> This project for devops course demo and practise

### Pre-Setup

- Clone repository:  `git clone ssh://git@git.wayarmy.net:401/devops/demo.git`

### Pre-practise

- Sign-up new account on gitlab

- Fork this project to personal project

- Enable gitlab runner in project's settings (If the CI/CD pipeline is pending)

### Practise 1: Write a new gitlab-ci file

- Edit file: `.gitlab-ci.yml` and change content to:

```
stages:
  - test
  - deploy

unit_test:
  stage: test
  script:
    - phpunit -v -c phpunit.xml --coverage-text --colors=never
```

- Add new deploy step, allow only deploy on master branch:

```
stages:
  - test
  - deploy

unit_test:
  stage: test
  script:
    - phpunit --bootstrap autoload.php .

deploy_to_production:
  stage: deploy
  script:
    - ./deploy production
  when: on_success
  environment:
    name: production
    url: http://demo.wayarmy.net
  only:
    - master
```

- Add new deployment, with new staging environment for reviewer:

```
stages:
  - test
  - deploy

unit_test:
  stage: test
  script:
    - phpunit --bootstrap autoload.php .

deploy_to_staging:
  stage: deploy
  script:
    - ./deploy staging
  when: on_success
  environment:
    name: staging
    url: http://staging.wayarmy.net
  only:
    - staging

deploy_to_production:
  stage: deploy
  script:
    - ./deploy production
  when: on_success
  environment:
    name: production
    url: http://demo.wayarmy.net
  only:
    - master
```

- Check out new branch: `staging`, watch CI-CD pipelines again