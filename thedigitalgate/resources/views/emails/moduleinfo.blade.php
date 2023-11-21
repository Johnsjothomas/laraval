<html>
<head>
</head>
<body>
<?php 
    $jobTypehtml = '';
    if($moduleinfo->jobtype_of_customer_contact != "")
    {
        
        if($moduleinfo->jobtype_of_customer_contact == "fulltime")
        {
            $jobTypehtml .= 'Full Time ';
        }
        else if($moduleinfo->jobtype_of_customer_contact == "internship")
        {
            $jobTypehtml .= 'Internship ';
        }
    }

    $companyNamehtml = '';
    if($moduleinfo->name_of_customer != "")
    {
        $companyNamehtml .= " For ".$moduleinfo->name_of_customer;
    }
    
?>
<div align="center">
  <table border="0" cellspacing="0" cellpadding="0" style="background-color:#66BB7F;width:100%;border-spacing:0;border-collapse:collapse;">
    <tbody>
      <tr>
        <td style="background-color:#04043C;padding:0;"><div align="center">
            <table border="0" cellspacing="0" cellpadding="0" style="background-color:#04043C;width:550pt;border-spacing:0;border-collapse:collapse;">
              <tbody>
                <tr>
                  <td style="padding:15pt 7.5pt 7.5pt 7.5pt;"><table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
                      <tbody>
                        <tr>
                          <td valign="top" style="width:435pt;padding:0;"><div align="center">
                              <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
                                <tbody>
                                  <tr>
                                    <td style="padding:0 3.75pt;"><p align="center" style="font-size:11pt;font-family:Calibri,sans-serif;text-align:center;margin:0;"> <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-safelink="true" data-linkindex="2"> <span style="color:#111111;font-size:10.5pt;"> <img data-imagetype="External" src="{{ asset('talent/assets/img/logoOnly.jpg') }}" border="0" id="x__x0000_i1026" style="width: 200px;"> </span> </a> <span style="font-size:1pt;"></span> </p></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </div></td>
      </tr>
    </tbody>
  </table>
</div>
<p style="font-size:11pt;font-family:Calibri,sans-serif;margin:0;" aria-hidden="true">&nbsp;</p>
<div align="center">
  <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
    <tbody>
      <tr>
        <td style="background-color:#04043C;padding:0;"><div align="center">
            <table border="0" cellspacing="0" cellpadding="0" style="width:550pt;border-spacing:0;border-collapse:collapse;">
              <tbody>
                <tr>
                  <td style="padding:0;"><table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
                      <tbody>
                        <tr>
                          <td valign="top" style="width:550pt;padding:0;"><div align="center">
                              <table border="0" cellspacing="0" cellpadding="0" style="background-color:white;width:100%;border-spacing:0;border-collapse:collapse;border-radius:4px;">
                                <tbody>
                                  <tr>
                                    <td style="padding:10pt 22.5pt 10pt 22.5pt;"><h1 align="center" style="font-size:24pt;font-family:Calibri,sans-serif;font-weight:bold;text-align:center;margin:0;line-height:28.5pt;"> <span style="color:#04043C;font-family:Helvetica,sans-serif;font-weight:normal;">About the Modules</span> </h1></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </div></td>
      </tr>
    </tbody>
  </table>
</div>
<div align="center">
  <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
    <tbody>
      <tr>
        <td style="padding:0;"><div align="center">
            <table border="0" cellspacing="0" cellpadding="0" style="background-color:white;width:550pt;border-spacing:0;border-collapse:collapse;">
              <tbody>
                <tr>
                  <td style="padding:0 22.5pt 11.25pt 22.5pt;"><table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
                      <tbody>
                        <tr>
                          <td><p style="margin:0;line-height:20.25pt;"> <span style="color:#666666;font-size:13.5pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->moduleTitle}} {{$companyNamehtml}}</span> </p></td>
                          <td><p style="margin:0;line-height:20.25pt; text-align:right"> <span style="color:#666666;font-size:13.5pt;font-family:Helvetica,sans-serif;">Total number of Days {{$moduleinfo->totalNoOfDays}}</span> </p></td>
                        </tr>
                        <tr>
                          <td><p style="margin:0;line-height:20.25pt;"> <span style="color:#666666;font-size:13.5pt;font-family:Helvetica,sans-serif;">Job Type {{$jobTypehtml}}</span> </p></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"><table border="1" cellspacing="0" cellpadding="5" style="width:100%;border-spacing:0;border-collapse:collapse; text-align:left">
                              <thead>
                                <tr>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif;">Day</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif;">Topic / Title</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif;">Time(mins)</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif;">Description</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif;">Intensity Level</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->totalNoOfDays}}</p></td>
                                  <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">Introduction</p></td>
                                  <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->timeInMinutesPerDay}}</p></td>
                                  <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->moduleDescription}}</p></td>
                                  <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->intesityLevel}}</p></td>
                                </tr>
                              </tbody>
                            </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2">
                            <table border="0" cellspacing="0" cellpadding="5" style="width:100%;border-spacing:0;border-collapse:collapse;">
                                <tbody>
                                <tr>
                                    <td width="50%"><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Session Type :-</p></td>
                                    <td width="50%"><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->sessiontype}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Preferred Languages :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->languages}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Duration of the module :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->startDateTime}} to {{$moduleinfo->endDateTime}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Maximum Participants quorum :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{($moduleinfo->maxParticipantPerModule - $moduleinfo->leftParticipantPerModule)}}/{{$moduleinfo->maxParticipantPerModule}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Lesson Requirments from the participants :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{(@$moduleinfo->lessonRequirementForparti ? implode(', ', json_decode($moduleinfo->lessonRequirementForparti, true)) : '')}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Trainer Handjob :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->traineeHandouts}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Digital Certificate Download :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->traineeHandouts}}</p></td>
                                </tr>
                                <tr>
                                    <td><p style="margin:0; color:#333333;font-size:11pt;font-family:Helvetica,sans-serif; font-weight:600">Join Now :-</p></td>
                                    <td><p style="margin:0; color:#666666;font-size:11pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->lmsURL}}</p></td>
                                </tr>
                                </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </div></td>
      </tr>
    </tbody>
  </table>
</div>
<p style="font-size:11pt;font-family:Calibri,sans-serif;margin:0;" aria-hidden="true">&nbsp;</p>
<div align="center">
  <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
    <tbody>
      <tr>
        <td style="padding:0;"><div align="center">
            <table border="0" cellspacing="0" cellpadding="0" style="background-color:white;width:550pt;border-spacing:0;border-collapse:collapse;">
              <tbody>
                <tr>
                  <td style="padding:0;"><table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
                      <tbody>
                        <tr>
                          <td valign="top" style="width:550pt;padding:0;"><div align="center">
                              <table border="0" cellspacing="0" cellpadding="0" style="background-color:#111111;width:100%;border-spacing:0;border-collapse:collapse;border-radius:4px;">
                                <tbody>
                                  <tr>
                                    <td style="padding:26.25pt 22.5pt 0 22.5pt;"><h2 style="font-size:18pt;font-family:Calibri,sans-serif;font-weight:bold;margin:0;line-height:21.75pt;"> <span style="color:white;font-family:Helvetica,sans-serif;font-weight:normal;">Need a hand?</span> </h2></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:15pt 22.5pt 0 22.5pt;"><p style="margin:0;line-height:20.25pt;"> <span style="color:#666666;font-size:13.5pt;font-family:Helvetica,sans-serif;">Our support team is always available to help you out. Let us know what you need using the link below &amp; we'll get in touch right away.</span> </p></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:15pt 22.5pt 30pt 22.5pt;"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table>
          </div></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>