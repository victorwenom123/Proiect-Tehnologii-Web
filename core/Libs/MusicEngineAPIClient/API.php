<?php
namespace MusicEngineAPI;
use MusicEngine\CoreSystem\Config;

class MusicEngineClient
{
    /**
     * @var string|string|null
     */
    protected $firstSongName;
    protected $firstSongAuthor;
    protected $secondSongName;
    protected $secondSongAuthor;

    /**
     * MusicEngineClient constructor.
     * @param string|null $firstSongName
     * @param string|null $firstSongAuthor
     * @param string|null $secondSongName
     * @param string|null $secondSongAuthor
     */
    public function __construct(string $firstSongName = null, string $firstSongAuthor = null, string $secondSongName = null, string $secondSongAuthor = null)
    {
            $this->firstSongName = $firstSongName;
            $this->secondSongName = $secondSongName;
            $this->firstSongAuthor = $firstSongAuthor;
            $this->secondSongAuthor  = $secondSongAuthor;
    }

    /**
     * @param string|string $method
     * @param string|null $endpoint
     * @return false|string
     */

    private function streamContextCreate(string $method = "GET",string $endpoint = null)
    {
        if($method == "POST")
        {
            $postdata = http_build_query(
                array(
                    'firstSongName' => $this->firstSongName,
                    'firstSongAuthor' => $this->firstSongAuthor,
                    'secondSongName' => $this->secondSongName,
                    'secondSongAuthor' => $this->secondSongAuthor
                )
            );
            // Create a stream
            $opts = [
                "http" => [
                    "method" => "POST",
                    "header" => 'Content-Type: application/x-www-form-urlencoded',
                    "content"=> $postdata,
                ]
            ];

            $context = stream_context_create($opts);

            return file_get_contents(Config::AUDIO_API_URL.$endpoint, false, $context);
        }
        else
        {
            return file_get_contents(Config::AUDIO_API_URL.$endpoint, false);
        }
    }

    /**
     * @param string $jsonString
     */

    public function prettyPrint(string $jsonString)
    {
        if(json_decode($jsonString,true))
        {
            echo "<pre>";
                var_dump(json_decode($jsonString,true));
            echo "</pre>";
        }
    }

    /**
     * @return false|string
     */
    public function index()
    {
        $query = $this->streamContextCreate("GET","/");
        return $query;
    }

    /**
     * @return false|string
     */
    public function returnAllSongs()
    {
        $query = $this->streamContextCreate("GET","get-songs");
        return $query;
    }

    /**
     * @return false|string
     */

    public function compareSongs()
    {
        $query = $this->streamContextCreate("POST","compare-songs");

        return $query;
    }

}

?>