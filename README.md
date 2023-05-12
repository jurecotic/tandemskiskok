php -S localhost:8000

[remote "dokku"]
	url = dokku@aws.futurama.si:tandemski-skok
	fetch = +refs/heads/*:refs/remotes/dokku/*