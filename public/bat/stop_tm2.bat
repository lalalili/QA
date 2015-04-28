@ECHO OFF
CLS
SCHTASKS /END /S 10.0.6.206 /U administrator /P admin156* /TN "Auto_tm2"
SCHTASKS /END /S 10.0.6.206 /U administrator /P admin156* /TN "Report_tm2"
Pause