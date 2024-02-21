<?php
namespace Aws\CloudHSMV2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudHSM V2** service.
 * @method \Aws\Result copysysToRegion(array $args = [])
 * @method \GuzzleHttp\Promise\Promise copysysToRegionAsync(array $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \Aws\Result createHsm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createHsmAsync(array $args = [])
 * @method \Aws\Result deletesys(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletesysAsync(array $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \Aws\Result deleteHsm(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteHsmAsync(array $args = [])
 * @method \Aws\Result describesyss(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describesyssAsync(array $args = [])
 * @method \Aws\Result describeClusters(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @method \Aws\Result initializeCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise initializeClusterAsync(array $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \Aws\Result modifysysAttributes(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifysysAttributesAsync(array $args = [])
 * @method \Aws\Result modifyCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyClusterAsync(array $args = [])
 * @method \Aws\Result restoresys(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoresysAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class CloudHSMV2Client extends AwsClient {}
