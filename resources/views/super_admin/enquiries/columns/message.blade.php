{{ (strlen($row->message) >= 55) ? substr($row->message,55)   : $row->message  }}   
