<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
  <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
    <tbody>
      <tr>
        <td style="padding:0;"><div>
            <table border="0" cellspacing="0" cellpadding="0" style="background-color:white;width:550pt;border-spacing:0;border-collapse:collapse;">
              <tbody>
                <tr>
                  <td style="padding:0 22.5pt 11.25pt 22.5pt;"><table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-spacing:0;border-collapse:collapse;">
                      <tbody>
                        <tr>
                          <td><p style="margin:0;line-height:20.25pt;"> <span style="color:#666666;font-size:13.5pt;font-family:Helvetica,sans-serif;">{{$moduleinfo->moduleTitle}} {{$companyNamehtml}}</span></p></td>
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
                          <td colspan="2" height="20"><table border="1" cellspacing="0" cellpadding="5" style="width:100%;border-spacing:0;border-collapse:collapse; text-align:left;">
                              <thead>
                                <tr>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif; text-align:left;">Day</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif; text-align:left;">Topic / Title</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif; text-align:left;">Time(mins)</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif; text-align:left;">Description</th>
                                  <th style="background-color:#D6D8DB; color:#666;font-size:10pt;font-family:Helvetica,sans-serif; text-align:left;">Intensity Level</th>
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
  </body>
</html>