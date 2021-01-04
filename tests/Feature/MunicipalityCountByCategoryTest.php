<?php


use Sagautam5\LocalStateNepal\Entities\Municipality;

class MunicipalityCountByCategoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Municipality
     */
    private $municipality;

    /**
     * @var array
     */
    private $languages = ['en', 'np'];

    /**
     * MunicipalityCountByCategoryTest constructor.
     * @throws \Sagautam5\LocalStateNepal\Exceptions\LoadingException
     */
    public function __construct()
    {
        $this->municipality = new Municipality($this->languages[array_rand($this->languages)]);
    }

    /**
     * Test Municipalities Count for Each Category
     */
    public function testMunicipalityCountByCategory()
    {
        $categoryIdSet = range(1,4);
        $categoryCountSet = [6,11,276,460];

        $correct = true;
        foreach ($categoryIdSet as $key => $id)
        {
            $municipalities = $this->municipality->getMunicipalityByCategory($id);
            if (!(is_array($municipalities) && count($municipalities) == $categoryCountSet[$key])) {
                $correct = false;
                $this->fail('Failed to get associated municipalities of district');
            }
        }

        if($correct)
            $this->assertTrue(true);
    }
}