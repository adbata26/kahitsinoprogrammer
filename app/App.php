
<?php 
class App
{   

    private function splitURL()
	{
		$url = $_SERVER['REQUEST_URI'];
		$url = trim($url, '/'); 
		$parts = explode('/', $url);

		$controllername = 'home';
	
	
		if(!empty($parts[0]))
		{
			$controllername = $parts[0];
		}
		return ucfirst($controllername);	
	}

    function loadController()
    {
		 
		$thepage = $this->splitURL();

		
		$controllerFilePath = 'app/views/' . $thepage . '.php';
		if (file_exists($controllerFilePath)) 
		{
            $filename = "app/views/" . $thepage . ".php";
            if (file_exists($filename)) 
            {
                $filename = "app/views/".$thepage.".php";
                if(file_exists($filename))
                {
                    require $filename;
                }
                
                else
                {
        
                    $filename = "app/views/_404.php";
                    require $filename;
                }
            } 
            else 
            {            
                $filename = "app/views/_404.php";
                require $filename;    
            }
		}
	    else 
		{
            $filename = "app/views/_404.php";
            require $filename;
		}


		
	

    }

}
