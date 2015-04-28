@ECHO OFF
CLS
SCHTASKS /END /S 10.0.6.206 /U administrator /P admin156* /TN "Auto_tm3"
SCHTASKS /END /S 10.0.6.206 /U administrator /P admin156* /TN "Report_tm3"
Pause