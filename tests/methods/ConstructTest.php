<?php

namespace ParseCsv\tests\methods;

use ParseCsv\Csv;
use PHPUnit\Framework\TestCase;

class ConstructTest extends TestCase {

    /**
     * CSV
     * The Csv object
     *
     * @access protected
     * @var    Csv
     */
    protected $csv = null;

    /**
     * Setup
     * Setup our test environment objects
     *
     * @access public
     */
    public function setUp() {
        //setup parse CSV
        #$this->csv = new Csv();
    }

    /**
     * Tear down
     * Tear down our test environment objects
     *
     * @access public
     */
    public function tearDown() {
        $this->csv = null;
    }

    public function test_offset_param() {
        $offset = 10;
        $this->csv = new Csv(null, $offset);
        $this->assertTrue(is_numeric($this->csv->offset));
        $this->assertEquals($offset, $this->csv->offset);
    }

    public function test_limit_param() {
        $limit = 10;
        $this->csv = new Csv(null, null, $limit);
        $this->assertTrue(is_numeric($this->csv->limit));
        $this->assertEquals($limit, $this->csv->limit);
    }

    public function test_conditions_param() {
        $conditions = 'some column NOT value';
        $this->csv = new Csv(null, null, null, $conditions);
        $this->assertTrue(is_string($this->csv->conditions));
        $this->assertEquals($conditions, $this->csv->conditions);
    }

    public function test_keep_file_data_param() {
        $keep = true;
        $this->csv = new Csv(null, null, null, null, $keep);
        $this->assertTrue(is_bool($this->csv->keep_file_data));
        $this->assertEquals($keep, $this->csv->keep_file_data);
    }

    public function test_input_param() {
        $csv = "col1,col2,col3\r\nval1,val2,val3\r\nval1A,val2A,val3A\r\n";
        $this->csv = new Csv($csv, null, null, null, true);
        $this->assertTrue(is_string($this->csv->file_data));
        $this->assertEquals($csv, $this->csv->file_data);
    }

    /**
     * @runInSeparateProcess because download.php uses header()
     *
     * @see                  https://github.com/sebastianbergmann/phpunit/issues/720#issuecomment-10421092
     */
    public function testCodeExamples() {
        foreach (glob('examples/*.php') as $script_file) {
            /** @noinspection PhpIncludeInspection */
            require $script_file;
        }
    }
}
