<?php

use EasyCorp\Bundle\EasyDeployBundle\Deployer\DefaultDeployer;

return new class extends DefaultDeployer
{
    public function configure()
    {

        return $this->getConfigBuilder()
            // SSH connection string to connect to the remote server (format: user@host-or-IP:port-number)
            ->server('iniakcomputsoft.com.ng')
            // the absolute path of the remote server directory where the project is deployed
            ->deployDir('/ota_public_html/')
            // the URL of the Git repository where the project code is hosted
            ->repositoryUrl('github.com/iniakpothompson/OTA-github')
            // the repository branch to deploy
            ->repositoryBranch('master')
        ;
    }

    // run some local or remote commands before the deployment is started
    public function beforeStartingDeploy()
    {
        $this->runLocal('./vendor/bin/simple-phpunit');
        $result = $this->runLocal('./bin/console app:optimize-for-deploy');
        if (!$result->isSuccessful()) {
            $this->notify($result->getOutput());
        }
    }

    // run some local or remote commands after the deployment is finished
    public function beforeFinishingDeploy()
    {
        $this->runRemote('./bin/console app:generate-xml-sitemap');
        $results = $this->runRemote('./bin/console app:generate-xml-sitemap');
        foreach ($results as $result) {
            $this->notify(sprintf('%d sitemaps on %s server', $result->getOutput(), $result->getServer()));
        }
       // $this->runRemote('{{ console_bin }} app:my-task-name');
        $this->runLocal('say "The deployment has finished."');
    }
};
