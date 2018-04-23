@echo off
rem start the Selenium RC server

rem The flags I pass to the server are not well documented, so here's an explanation:

rem -proxyInjectionMode                     allows RC to change domains during a test
rem -trustAllSSLCertificates -avoidProxy    allows RC to switch from http to https during a test
rem finally, %* is simply Windows' alias for "all the arguments passed to this batch file"
rem so you can pass more flags to RC when you invoke this batch file ^_^

start java -jar "c:\toolchain\selenium-server-1.0-beta-2\selenium-server.jar" -proxyInjectionMode -trustAllSSLCertificates -avoidProxy -log "log/selenium-server.log" %*