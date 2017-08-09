<?php
namespace Myhttp\Psr7;

use Psr\Http\Message\UriInterface;

class Uri implements UriInterface
{
    const HTTP_DEFAULT_HOST = 'localhost';

    private static $defaultPorts = [
        'http'  => 80,
        'https' => 443,
        'ftp'   => 21,
        'gopher'=> 70,
        'nntp'  => 119,
        'news'  => 119,
        'telnet'=> 23,
        'tn3270'=> 23,
        'imap'  => 143,
        'pop'   => 110,
        'ldap'  => 389
    ];

    private $scheme = '';

    /** @var string  */
    private $userInfo = '';

    private $host = '';

    private $port;

    private $path = '';

    private $query = '';

    private  $fagment = '';

    public static function isDefaultPort(UriInterface $uri)
    {
        return $uri->getPort() === null || (isset(self::$defaultPorts[$uri->getScheme()]) && $uri->getPort() === self::$defaultPorts[$uri->getScheme()]);
    }

    private function removeDefaultPort()
    {
        if($this->port !== null && self::isDefaultPort($this)){
            $this->port = null;
        }
    }
    public function getAuthority()
    {
        // TODO: Implement getAuthority() method.
    }

    public function getScheme()
    {
        return $this->scheme;
    }


    public function getUserInfo()
    {
        // TODO: Implement getUserInfo() method.
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getFragment()
    {
        return $this->fagment;
    }


    public function withScheme($scheme)
    {
        // TODO: Implement withScheme() method.
    }


    public function withUserInfo($user, $password = null)
    {
        // TODO: Implement withUserInfo() method.
    }


    public function withHost($host)
    {
        // TODO: Implement withHost() method.
    }

    public function withPort($port)
    {
        $port = $this->filterPort($port);
        if($this->port === $port){
            return $this;
        }

        $new = clone $this;
        $new->port = $port;
        $new->removeDefaultPort();
        $new->validateState();

        return $new;
    }

    public function withPath($path)
    {
        // TODO: Implement withPath() method.
    }

    public function withQuery($query)
    {
        // TODO: Implement withQuery() method.
    }

    public function withFragment($fragment)
    {
        // TODO: Implement withFragment() method.
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    private function filterScheme($scheme){
        if(!is_string($scheme)){
            throw new \InvalidArgumentException('Scheme must be a string');
        }
        return strtolower($scheme);
    }

    private function filterHost($host){
        if(!is_string($host)){
            throw new \InvalidArgumentException('Host must be a string');
        }
        return strtolower($host);
    }

    private function filterPort($port){
        if($port === null){
            return null;
        }
        $port = (int) $port;
        if(1 > $port || 0xffff < $port){
            throw new \InvalidArgumentException('Invalid port: %d.Must be between 1 and 65535', $port);
        }
        return $port;
    }

    private function validateState()
    {
        if($this->host === '' && ($this->scheme === 'http' || $this->scheme === 'https') ){
            $this->host = self::HTTP_DEFAULT_HOST;
        }

        if($this->getAuthority() === ''){

        }elseif($this->path[0] && $this->path[0] !== '/'){

        }
    }
}