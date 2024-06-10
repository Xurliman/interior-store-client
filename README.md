This is fantom-configurator's Unified Base Platform module. 
Details will be added later.


## How to use it locally

First of all, you need to have installed [Docker Desktop]((https://docs.docker.com/desktop/install/windows-install/)) and [Git]((https://git-scm.com/download/win)).

Then you need to clone repos to local workstation:

```
// make a folder for this project
mkdir /Projects_folder/fantom-configurator

// go to the folder
cd  /Projects_folder/fantom-configurator

// clone Unified Base Platform module
git clone https://gitlab.fantomstudio.uz/root/fantom-configurator-ubp.git

// clone Custom content module
git clone https://gitlab.fantomstudio.uz/root/fantom-configurator-cc.git

// clone Licence Server module
git clone https://gitlab.fantomstudio.uz/root/fantom-configurator-ls.git
```

Then you can build the solution:

```
cd /Projects_folder/fantom-configurator/fantom-configurator-ubp/
docker compose build
```

These commands run docker-compose.yml and Dockerfile. 
There are 2 Docker containers: 'app' and 'db'.

You can find their binded folder there: 

```
\\wsl.localhost\docker-desktop-data\data\docker\volumes
```

Make sure you did the same for fantom-configurator-cc and fantom-configurator-ls.

Then you can run the project:
```
cd /Projects_folder/fantom-configurator/fantom-configurator-ubp/
docker compose up
```

Now you can access web interface at http://localhost:8000/


To avoid rebuilding app container each run you can use docker-starter.bat script. It checks if the container already exists 
and if yes just copies files from the repo to the container. 

