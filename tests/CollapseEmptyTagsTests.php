<?php

class CollapseEmptyTagsTests extends AbstractUnitTests
{
    /**
     * @covers XML_Util::collapseEmptyTags()
     */
    public function testCollapseEmptyTagsBasicUsage()
    {
        $emptyTag = "<foo></foo>";
        $expected = "<foo />";
        $this->assertEquals($expected, XML_Util::collapseEmptyTags($emptyTag));
    }

    /**
     * @covers XML_Util::collapseEmptyTags()
     */
    public function testCollapseEmptyTagsBasicUsageAlongsideNonemptyTag()
    {
        $emptyTag = "<foo></foo>";
        $otherTag = "<bar>baz</bar>";
        $expected = "<foo /><bar>baz</bar>";
        $this->assertEquals($expected, XML_Util::collapseEmptyTags($emptyTag . $otherTag));
    }

    /**
     * @covers XML_Util::collapseEmptyTags()
     */
    public function testCollapseEmptyTagsOnOneEmptyTagWithCollapseAll()
    {
        $emptyTag = "<foo></foo>";
        $expected = "<foo />";
        $this->assertEquals($expected, XML_Util::collapseEmptyTags($emptyTag, XML_UTIL_COLLAPSE_ALL));
    }

    /**
     * @covers XML_Util::collapseEmptyTags()
     */
    public function testCollapseEmptyTagsOnOneEmptyTagAlongsideNonemptyTagWithCollapseAll()
    {
        $emptyTag = "<foo></foo>";
        $otherTag = "<bar>baz</bar>";
        $expected = "<foo /><bar>baz</bar>";
        $this->assertEquals($expected, XML_Util::collapseEmptyTags($emptyTag . $otherTag, XML_UTIL_COLLAPSE_ALL));
    }

    /**
     * @covers XML_Util::collapseEmptyTags()
     */
    public function testCollapseEmptyTagsOnOneEmptyTagWithCollapseXhtml()
    {
        $emptyTag = "<foo></foo>";
        $expected = "<foo></foo>";
        $this->assertEquals($expected, XML_Util::collapseEmptyTags($emptyTag, XML_UTIL_COLLAPSE_XHTML_ONLY));
    }

    /**
     * @covers XML_Util::collapseEmptyTags()
     */
    public function testCollapseEmptyTagsOnOneEmptyTagAlongsideNonemptyTagWithCollapseXhtml()
    {
        $emptyTag = "<foo></foo>";
        $otherTag = "<bar>baz</bar>";
        $xhtmlTag = "<b></b>";
        $expected = "<foo></foo><b></b><bar>baz</bar>";
        $this->assertEquals($expected, XML_Util::collapseEmptyTags($emptyTag . $xhtmlTag . $otherTag, XML_UTIL_COLLAPSE_XHTML_ONLY));
    }
}