<?php 
if(!function_exists('pre'))
{
    function pre($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
if(!function_exists('setProfilePic'))
{
	function setProfilePic($profilePicOld)
	{
        $profilePic = url("/images/usericon.png");
        if(@$profilePicOld)
        {
            if(file_exists( public_path() . '/uploads/profile/'.$profilePicOld))
            {
                $profilePic = url("/uploads/profile").'/'.$profilePicOld;
            }
        }
        return $profilePic;
    }
}
if(!function_exists('setResumeUrl'))
{
	function setResumeUrl($resumeUrl)
	{
        if(@$resumeUrl && file_exists( public_path() . '/uploads'.'/'.$resumeUrl))
        {
            $resumeUrl = url("/uploads").'/'.$resumeUrl;
        }
        else
        {
            $resumeUrl = "javascript:;";
        }
        return $resumeUrl;
    }
}
if(!function_exists('dateFormatFromAny'))
{
    function dateFormatFromAny($dates, $returnFormat="Y-m-d")
    {
        if(@$dates)
        {
            if(empty($returnFormat))
            {
                $returnFormat = 'Y-m-d';
            }
            if(is_array($dates))
            {
                $newArr = array();
                foreach($dates as $rowData)
                {
                    $newArr[] = date($returnFormat, strtotime($rowData));
                }
                $dates = $newArr;
            }
            else
            {
                $dates = date($returnFormat, strtotime($dates));
            }
        }
        return $dates;
    }
}
if(!function_exists('repalceWithMentor'))
{
	function repalceWithMentor($word)
	{
        $replcedWord = $word;
        if(preg_match('~^\p{Lu}~u', $word))
        {
            $replcedWord = 'Mentor';
        }
        else
        {
            $replcedWord = 'mentor';
        }
    
        if(substr($word, -1) == 's')
        {
            $replcedWord .= 's';
        }
        else if(substr($word, -1) == 'S')
        {
            $replcedWord .= 'S';
        }

        if(ctype_upper($word))
        {
            $replcedWord = strtoupper($replcedWord);
        }
        return $replcedWord;
    }
}
if(!function_exists('repalceWithMentorRole'))
{
	function repalceWithMentorRole($word)
	{
        $replaced_word = $word;
        $replaced_word = str_replace("trainer","mentor",$replaced_word);
        $replaced_word = str_replace("Trainer","Mentor",$replaced_word);
        return $replaced_word;
    }
}
if(!function_exists('check_json'))
{
    function check_json($json,$assArr = true)
    {
        if(empty($json))
        {
            return array();
            die;
        }
        if($json == 'Array')
        {
            return array();
            die;
        }
        if (!is_array($json))
        {
            if($assArr == true)
                return json_decode($json, true);
            else
                return json_decode($json);
        }
        else 
        {
            return $json;
        }
    }
}
if(!function_exists('check_json_encode'))
{
    function check_json_encode($json)
    {
        if(empty($json))
        {
            return '[]';
        }
        
        if (is_array($json))
        {
            return json_encode($json,JSON_UNESCAPED_UNICODE);
        }
        else 
        {
            return $json;
        }
    }
}
if(!function_exists('get_content_mime_type'))
{
    function get_content_mime_type($ext)
    {
        $mimes = array(
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',
            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'docx' => 'application/msword',
            'xlsx' => 'application/vnd.ms-excel',
            'pptx' => 'application/vnd.ms-powerpoint',
            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            );
        if(@$mimes[$ext])
        {
            $returnval = $mimes[$ext];
        }
        else
        {
            $returnval = 'image/png';
        }
        return $returnval;
    }
}