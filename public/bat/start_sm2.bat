@ECHO OFF
CLS
SCHTASKS /Run /S 10.0.6.207 /U administrator /P admin156* /I /TN "Auto_sm2"
Pause