<?php
namespace Tractorscope;

class Embed {

  /** @var string The Tractorscope API Secret key to be used for requests. */
  public $apiSecretKey;

  /** @var string default base URL for TractorScope's Embed API */
  const EMBED_BASE = 'https://app.tractorscope.com/embed';

   /**
     * Initializes a new instance of the Embed class.
     *
     * The constructor takes a single argument, the API key
     *
     * @param string $config the API Secret key
     */

  public function __construct($apiSecretKey='')
  {
    if (empty($apiSecretKey))
      throw new \Exception('You must provide an API secret key to use the Tractorscope Embed API');

    $this->apiSecretKey = $apiSecretKey;
  }

  /**
     * @param array $params
     * @param string $params['dashboard'] The dashboard id to embed
     * @param null|array $params['filters'] The filters to apply to the dashboard
     * @param null|int $params['latency'] The latency in minutes to use for the embed refresh key
     *
     * @throws \Exception if the fails
     *
     * @return string
     */

  public function getUrl($params = null)
  {
    if (empty($params) || empty($params['dashboard']))
      throw new \Exception('You must provide a dashboard id to create an embed');

    $dashboard = $params['dashboard'];
    $filters = $params['filters'] ?? null;
    $latency = $params['latency'] ?? null;

    $data = (object) array(
      'dashboard' => $dashboard
    );

    if (!empty($latency))
      $filters['embed_refresh_key'] = floor(time() / ($latency * 60)); 

    if (!empty($filters))
      $data->filters = $filters;      

    $data = rawurlencode(json_encode($data));

    $signature = hash_hmac('sha256', $data, $this->apiSecretKey);

    $embed_url = self::EMBED_BASE.'/dashboard/' . $dashboard . '?data=' . $data . '&signature=' . $signature;

    return $embed_url;  
  }

}
