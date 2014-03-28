<?php
//Version 1.0
//Last Updated 20-11-2013

class Page extends Main {

	private $limit;
	private $obj_cms;/// for getting cms methods
	
	
    /**
     * The PDO object to be used on every connection requested
     * @var PDO
     */
    private $_connection;
    
    /**
     * The string for identifying the pager value
     * Has to be from GET or POST
     * @var string 
     */
    private $_paginator = 'page';
      
    /**
     * The SQL string itself
     * @var string 
     */
    private $_sql;
    
    /**
     * The total of results per age
     * @var type 
     */
    private $_limit_per_page = 10;
    
    /**
     * The total of pages in the menu 
     * @var type 
     */
    private $_range = 5;

    /**
     * The constructor gets the PDO conection object
     * 
     * @param PDO $connection 
     */
    public function __construct() 
    {
	
			
	
        parent::__construct();
        $this->setConnection( $this->db->pdo );
        $this->getPager();
		
		$this->obj_cms			= $this->load_model('Cms');
		$cms_data				= $this->obj_cms->getCmsList(); 
		if($cms_data !="" && isset ($cms_data['opt_pagi']) && $cms_data['opt_pagi']!=""){
					$this->limit	= intval($cms_data['opt_pagi']);
		}else
		{
					$this->limit	= 10;
		}
        
    }
    
    /**
     * This method gets the total of results found by querying the database
     * It can be accessed outside to check if no records were found
     * so that you can prevent some html code to be rendered
     * Note that we don't use getSQL but _sql property
     * It's because the getSEL returns the LIMIT and OFFSET
     * 
     * @return int
     */
    public function getTotalOfResults() 
    {
        $result = $this->_connection->query(
            str_replace( '*', 'COUNT(*)', $this->_sql )
        );

        return (int) $result->fetchColumn();
        
    }

    /**
     * This method is a helper method for
     * validating the connection checking
     * if the passed variable is an object
     * instance of native PDO class
     * 
     * @see __contruct()
     * @param PDO $connection
     * @throws Exception 
     */
    private function setConnection( $connection ) 
    {

        if ( $connection instanceof PDO ) {
            $this->_connection = $connection;
        } else {
            throw new Exception('<<THIS DEPENDENCY NEEDS A PDO OBJECT>>');
        }
        
    }
    
    /**
     * This method prints the result bar 
     * containg all the available information.
     * You can change the HTML inside the 
     * printf function to fit your needs 
     */
    public function printResultBar() 
    {         
        
        if( $this->getTotalOfResults() > 0 ) { 
           printf("
               <div id=\"result-bar\">
                Showing page <span>%s</span> of <span>
                %s</span> pages for
                <span>%s</span> 
                results.         
               </div>
                "
               , $this->getCurrentPage()
               , $this->getTotalOfPages()
               , $this->getTotalOfResults()
           );
           
        } else { 
            print "<div id=\"result-bar-not-found\">
               No records were found to your search.</div>"; 
        }     
        
    } 
    
   /* public function printNavigationBar()  
    { 
        $current_page = $this->getCurrentPage();
        $total_of_pages = $this->getTotalOfPages();
        $paginator = $this->getPaginator();
        //$query_string =	$this->rebuildQueryString( $paginator );
		$query_string='';
        $range = $this->getRange();
        
        if($this->getTotalOfResults() > 0) {         
            print "<div id=\"navigation-bar\">"; 
            if ( $current_page > 1 ) { 
                print " <a href=\"?" . $paginator . "=1"  
                        . $query_string 
                        . "\" class=\"first\"><span>First</span></a> "; 
                $previous = $current_page - 1; 
                print " <a href=\"?" . $paginator . "=" 
                        . $previous . $query_string 
                        . "\" class=\"previous\"><span>Previous</span></a> "; 
            } 
             
            for ( 
                $x = ( $current_page - $range ); 
                $x < ( ( $current_page + $range ) + 1 ); 
                $x++ 
            ) { 
                if ( ( $x > 0 ) && ( $x <= $total_of_pages ) ) { 
                    if ( $x == $current_page ) { 
                        print " [<span class=\"current\">$x</span>] "; 
                    } else { 
                        print " <a href=\"?" . $paginator . "=" . $x 
                              . $query_string . "\" class=\"others\">$x</a> "; 
                    } 
                } 
            } 
             
            if ( $current_page != $total_of_pages ) { 
                $next = $current_page + 1; 
                print " <a href=\"?" . $paginator . "=" 
                        . $next . $query_string 
                        . "\" class=\"next\">Next</a> "; 
                print " <a href=\"?" . $paginator . "=" 
                        . $total_of_pages . $query_string 
                        . "\" class=\"last\">Last</a> "; 
            } 
             
            print '</div>';             
        }     
    }    
	*/
	
	//For Project Safqah duplicate of  printNavigationBar()
	public function printNavBar($qs=false,$qs_custom=false)  
    { 
        $current_page = $this->getCurrentPage();
        $total_of_pages = $this->getTotalOfPages();
        $paginator = $this->getPaginator();
		$query_string='';
		
		//For not using rebuildQueryString
		
		if($qs)
		$query_string = $this->rebuildQueryString( $paginator );
		else  if($qs_custom)  //For custom QueryString
		$query_string=$qs_custom;  
		
		
		  
		
        $range = $this->getRange();
        
		
		/*
		<li class="prev disabled"><a href="index.htm#">← Previous</a>
												</li>
												<li class="active"><a href="index.htm#">1</a>
												</li>
												<li><a href="index.htm#">2</a>
												</li>
												<li class="next"><a href="index.htm#">Next → </a>
												</li>
												*/
		
		
		
        if($this->getTotalOfResults() > 0) {         
            print "<ul class=\"pagination\">"; 
            if ( $current_page > 1 ) { 
                print " <li class='active'><a href=\"?" . $paginator . "=1"  
                        . $query_string 
                        . "\" class=\"first\"><span>First</span></a></li> "; 
                $previous = $current_page - 1; 
                print " <li class='prev'><a href=\"?" . $paginator . "=" 
                        . $previous . $query_string 
                        . "\" class=\"previous\"><span>← Previous</span></a> </li>"; 
            } 
             
            for ( 
                $x = ( $current_page - $range ); 
                $x < ( ( $current_page + $range ) + 1 ); 
                $x++ 
            ) { 
                if ( ( $x > 0 ) && ( $x <= $total_of_pages ) ) { 
                    if ( $x == $current_page ) { 
                        print " <li class='active'><a href='#'>$x</a></li>"; 
                    } else { 
                        print "<li> <a href=\"?" . $paginator . "=" . $x 
                              . $query_string . "\" class=\"others\">$x</a></li> "; 
                    } 
                } 
            } 
             
            if ( $current_page != $total_of_pages ) { 
                $next = $current_page + 1; 
                print " <li><a href=\"?" . $paginator . "=" 
                        . $next . $query_string 
                        . "\" class=\"next\">Next → </a> </li>"; 
                print " <li><a href=\"?" . $paginator . "=" 
                        . $total_of_pages . $query_string 
                        . "\" class=\"last\">Last</a></li> "; 
            } 
             
            print '</ul>';             
        }     
    }    
	
	
	//For Project Safqah User Side Pagination of  printNavigationBar()
	public function printUserNavBar($qs=false,$qs_custom=false)  
    { 
        $current_page = $this->getCurrentPage();
        $total_of_pages = $this->getTotalOfPages();
        $paginator = $this->getPaginator();
		$query_string='';
		
		//For not using rebuildQueryString
		
		if($qs)
		$query_string = $this->rebuildQueryString( $paginator );
		else  if($qs_custom)  //For custom QueryString
		$query_string=$qs_custom;  
		
		
		  
		
        $range = $this->getRange();
        
		
		/*
		<li class="prev disabled"><a href="index.htm#">← Previous</a>
												</li>
												<li class="active"><a href="index.htm#">1</a>
												</li>
												<li><a href="index.htm#">2</a>
												</li>
												<li class="next"><a href="index.htm#">Next → </a>
												</li>
												*/
		
		
		
        if($this->getTotalOfResults() > 0) {         
           print "<ul class=\"pagination light\">"; 
            if ( $current_page > 1 ) { 
                print " <a href=\"?" . $paginator . "=1"  
                        . $query_string 
                        . "\" class=\"first\"><li class='active pagi'><span>First</span></li></a> "; 
                $previous = $current_page - 1; 
                print " <a href=\"?" . $paginator . "=" 
                        . $previous . $query_string 
                        . "\" class=\"previous \"><li class='prev pagi'><span>← Previous</span></li></a> "; 
            } 
             
            for ( 
                $x = ( $current_page - $range ); 
                $x < ( ( $current_page + $range ) + 1 ); 
                $x++ 
            ) { 
                if ( ( $x > 0 ) && ( $x <= $total_of_pages ) ) { 
                    if ( $x == $current_page ) { 
                        print " <a href='#'><li class='active pagi'>$x</li></a>"; 
                    } else { 
                        print "<a  href=\"?" . $paginator . "=" . $x 
                              . $query_string . "\"><li class='pagi'> $x</li></a> "; 
                    } 
                } 
            } 
             
            if ( $current_page != $total_of_pages ) { 
                $next = $current_page + 1; 
                print " <a href=\"?" . $paginator . "=" 
                        . $next . $query_string 
                        . "\" class=\"next\"><li class=\"pagi\">Next → </li></a> "; 
                print " <a href=\"?" . $paginator . "=" 
                        . $total_of_pages . $query_string 
                        . "\" class=\"last\"><li class=\"pagi\">Last</li></a> "; 
            } 
             
           print '</ul>';             
        }     
    }    
	 
    
    /**
     * This method returns the total number of pages
     * @return integer 
     */
    public function getTotalOfPages() 
    {        
        
        return ceil( $this->getTotalOfResults() / $this->getLimitPerPage() );
        
    } 

    /**
     * This method returns the number of the current page
     * 
     * @return int 
     */
    public function getCurrentPage() 
    { 
        $total_of_pages = $this->getTotalOfPages();
        $pager = $this->getPager();
        
        if ( isset( $pager ) && is_numeric( $pager ) ) {          
            $currentPage = $pager; 
        } else { 
            $currentPage = 1; 
        } 

        if ( $currentPage > $total_of_pages ) { 
            $currentPage = $total_of_pages; 
        } 

        if ($currentPage < 1) { 
            $currentPage = 1; 
        } 

        return (int) $currentPage; 
         
    } 
    
    /**
     * This method prepares the offset value for the sql() method
     * 
     * @return int
     */
    private function getOffset() 
    {       
       
        return  ( $this->getCurrentPage() - 1 ) * $this->getLimitPerPage();  
        
    } 
    
    /**
     * This method just validates if a string is passed 
     * 
     * @param string $string
     * @throws Exception 
     */
    public function setSQL( $string ) 
    {
        
        if ( strlen( $string ) < 0 ) {
            throw new Exception( "<<THE QUERY NEEDS A SQL STRING>>" );
        } 
        
        $this->_sql = $string;
        
    }

    /**
     * This method returns the SQL string
     * 
     * @return string
     */
    public function getSQL() 
    {
        $limit_per_page = $this->getLimitPerPage();
        $offset = $this->getOffset();
        
        return $this->_sql .  " LIMIT {$limit_per_page} OFFSET {$offset} "; 
        
    }
    
    /**
     * This method sets the pager other
     * than the one passed in the class declaration 
     */
    public function setPaginator( $paginator ) 
    {
        
        if( !is_string( $paginator ) ) {
            throw new Exception("<<PAGINATOR MUST BE OF TYPE STRING>>");
        } 
        
        $this->_paginator = $paginator;
        
    }
    
    /**
     * This method returns the paginator used to get the pager
     * 
     * @return string 
     */
    private function getPaginator()
    {
        return $this->_paginator;
    }

    /**
     * This method returns the value to paginate
     * 
     * @return type 
     */
    public function getPager() 
    {
        
         return ( isset ( $_REQUEST["{$this->_paginator}"] ) )  
                ? (int) $_REQUEST["{$this->_paginator}"]  
                : 0 
        ;  
        
    }


    /**
     * This method sets the limit of pagination available on the page
     * 
     * @param int $limit
     * @return boolean
     * @throws Execption 
     */
    public function setLimitPerPage() 
    {
		
        if( !is_int( $this->limit ) ) {
            throw new Execption( "<<THE LIMIT MUST BE AN INTEGER>>" );
        }
        
        $this->_limit_per_page = $this->limit;
        
        
    }

    /**
     * This method returns the availabe pagination limit per page
     * 
     * @return type 
     */
    public function getLimitPerPage() 
    {
        
        return $this->_limit_per_page;
        
    }

    /**
     * This method sets the range of pages to be selected
     * 
     * @param int $range
     * @throws Execption 
     */
    public function setRange( $range ) 
    {
        
        if( !is_int( $range ) ) {
            throw new Execption( "<<THE RANGE MUST BE AN INTEGER>>" );
        }
        
        $this->_range = $range;
        
    }

    /**
     * This method returns the range of pages to be selected
     * from start to end in the pagination menu bar
     * 
     * @return int
     */
    public function getRange() 
    {
        
        return $this->_range;
        
    }
    
    /**
     * This method rebuilds the query string.
     * It's refactored from some code I found on the internet
     * 
     * @param string $query_string
     * @return boolean|string 
     */
    public function rebuildQueryString ( $query_string ) 
    { 
        $old_query_string = $_SERVER['QUERY_STRING'];
        
        if ( strlen( $old_query_string ) > 0 ) { 
            
            $parts = explode("&", $old_query_string ); 
            $new_array = array();
            
            foreach ($parts as $val) {
			
                if ( stristr( $val, $query_string ) == false)  { 
                    array_push( $new_array , $val ); 
                } 
            } 
            
            if ( count( $new_array ) != 0 ) { 
                $new_query_string = "&".implode( "&", $new_array ); 
            } else { 
                return false; 
            }
            
            return $new_query_string;
            
        } else { 
            return false; 
        } 
        
    }     
	
	/**
     * This method is used to get addon for querystring
     * 
     * @param none
     * @return query string 
     */
	
	 public function getQs()
	 {
		 if(isset($_GET["{$this->_paginator}"]) )
		 {
			return  "&$this->_paginator=".$_GET["{$this->_paginator}"];
		 }
		 else 
		 return '';
		 
	 }
	
	
	

}