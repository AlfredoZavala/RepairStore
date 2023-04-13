<?php

require './pdfcrowd.php';

try
{
  // create the API client instance
  $client = new \Pdfcrowd\HtmlToPdfClient("AlfredoZavala", "49a13af8d546559d9f70d31d1fbcc435");

  // create output stream for conversion result
  $output_stream = fopen("testt.pdf", "wb");

  // check for a file creation error
  if (!$output_stream)
  throw new \Exception(error_get_last()['message']);

  // run the conversion and write the result into the output stream
  $client->convertFileToStream("./test.php", $output_stream);

  // close the output stream
  fclose($output_stream);
}
catch(\Pdfcrowd\Error $why)
{
  // report the error
  error_log("Pdfcrowd Error: {$why}\n");

  // rethrow or handle the exception
  throw $why;
}




// Store the file name into variable
$file = 'test.pdf';
$filename = 'test.pdf';

// Header content type
header('Content-type: application/pdf');

header('Content-Disposition: inline; filename="' . $filename . '"');

header('Content-Transfer-Encoding: binary');

header('Accept-Ranges: bytes');

// Read the file
@readfile($file);



?>
