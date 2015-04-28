@ECHO OFF
CLS
SCHTASKS /END /S 10.0.6.207 /U administrator /P admin156* /TN "Auto_sm4"
SCHTASKS /END /S 10.0.6.207 /U administrator /P admin156* /TN "Report_sm4"
Pause