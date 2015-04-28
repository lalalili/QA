@ECHO OFF
CLS
SCHTASKS /Run /S 10.0.6.206 /U administrator /P admin156* /I /TN "Auto_tm4"
Pause