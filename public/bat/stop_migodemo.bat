@ECHO OFF
CLS
SCHTASKS /END /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_migodemo"
SCHTASKS /END /S 10.0.6.219 /U administrator /P admin156* /TN "Report_migodemo"
Pause