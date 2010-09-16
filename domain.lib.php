<?php

/**
 * Two small helper functions for finding the top level domain (com, dk, au...)
 * and the "domain" (github.com, google.com etc)
 *
 * @author jimmiw
 * @site http://westsworld.dk
 * @since 2010-09-16
 */

/**
 * Finds the Top Level Domain, this could be "com", "dk" etc.
 * For more information about TLD's see: http://en.wikipedia.org/wiki/Tld
 *
 * @param string $url the url to find the top level domain for.
 * @return string the top level domain found, else an empty string
 */
function get_tld($url) {
  $tld = "";
  
  $domain = get_domain($url);
  if($domain != "") {
    preg_match('/[^.]+$/', $domain, $matches);
    
    /*echo "tld: \n";
    print_r($matches);*/
    
    $tld = $matches[0];
  }
  
  return $tld;
}

/**
 * Finds the domain name of an URL.
 * For more information about domains see: http://en.wikipedia.org/wiki/Domain_name
 *
 * @param string $url the url to find the domain for.
 * @return string the domain found, else an empty string
 */
function get_domain($url) {
  $domain = "";
  
  $services = "(http:\/\/|https:\/\/|ftp:\/\/){0,1}";
  // pattern for IP-addresses
  $ipPattern = '/^'.$services.'(([0-9]{1,3}.){3}[0-9]{1,3}){1}/';
  // localhost
  $localhostPattern = '/^'.$services.'localhost{1}/';
  
  // tests that it is not localhost or an ip
  if(preg_match($localhostPattern, $url) == 0 && preg_match($ipPattern, $url) == 0) {
    //echo $url."\n";
    
    preg_match('@^(?:(http|https|ftp|sftp)://)?([^/]+)@i',$url, $matches);
    //print_r($matches);
    preg_match('/[^.]+\.[^.]+$/', $matches[2], $matches);
    $domain = $matches[0];
    //echo "domain: ".$domain."\n";
  }
  
  return $domain;
}


?>