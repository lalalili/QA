@ECHO OFF
CLS
SCHTASKS /END /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_sm3"
SCHTASKS /END /S 10.0.6.219 /U administrator /P admin156* /TN "Report_sm3"
Pause