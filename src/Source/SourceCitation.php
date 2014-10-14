<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Source;

use Gedcomx\Links\HypermediaEnabledData;

/**
 * Represents a source citation.
 */
class SourceCitation extends HypermediaEnabledData
{

    /**
     * The language of the note.
     *
     * @var string
     */
    private $lang;

    /**
     * A reference to the citation template for this citation.
     *
     * @var \Gedcomx\Common\ResourceReference
     */
    private $citationTemplate;

    /**
     * The list of citation fields.
     *
     * @var \Gedcomx\Source\CitationField[]
     */
    private $fields;

    /**
     * A rendering (as a string) of a source citation.  This rendering should be the most complete rendering available.
     *
     * @var string
     */
    private $value;

    /**
     * Constructs a SourceCitation from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     *
     * @throws \Exception
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        }
        else if ($o instanceof \XMLReader) {
            $success = true;
            while ($success && $o->nodeType != \XMLReader::ELEMENT) {
                $success = $o->read();
            }
            if ($o->nodeType != \XMLReader::ELEMENT) {
                throw new \Exception("Unable to read XML: no start element found.");
            }

            $this->initFromReader($o);
        }
    }

    /**
     * The language of the note.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * The language of the note.
     *
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }
    /**
     * A reference to the citation template for this citation.
     *
     * @return \Gedcomx\Common\ResourceReference
     */
    public function getCitationTemplate()
    {
        return $this->citationTemplate;
    }

    /**
     * A reference to the citation template for this citation.
     *
     * @param \Gedcomx\Common\ResourceReference $citationTemplate
     */
    public function setCitationTemplate($citationTemplate)
    {
        $this->citationTemplate = $citationTemplate;
    }
    /**
     * The list of citation fields.
     *
     * @return \Gedcomx\Source\CitationField[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * The list of citation fields.
     *
     * @param \Gedcomx\Source\CitationField[] $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }
    /**
     * A rendering (as a string) of a source citation.  This rendering should be the most complete rendering available.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * A rendering (as a string) of a source citation.  This rendering should be the most complete rendering available.
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
    /**
     * Returns the associative array for this SourceCitation
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->lang) {
            $a["lang"] = $this->lang;
        }
        if ($this->citationTemplate) {
            $a["citationTemplate"] = $this->citationTemplate->toArray();
        }
        if ($this->fields) {
            $ab = array();
            foreach ($this->fields as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['fields'] = $ab;
        }
        if ($this->value) {
            $a["value"] = $this->value;
        }
        return $a;
    }


    /**
     * Initializes this SourceCitation from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        parent::initFromArray($o);
        if (isset($o['lang'])) {
            $this->lang = $o["lang"];
        }
        if (isset($o['citationTemplate'])) {
            $this->citationTemplate = new \Gedcomx\Common\ResourceReference($o["citationTemplate"]);
        }
        $this->fields = array();
        if (isset($o['fields'])) {
            foreach ($o['fields'] as $i => $x) {
                $this->fields[$i] = new \Gedcomx\Source\CitationField($x);
            }
        }
        if (isset($o['value'])) {
            $this->value = $o["value"];
        }
    }

    /**
     * Sets a known child element of SourceCitation from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'citationTemplate') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new \Gedcomx\Common\ResourceReference($xml);
            $this->citationTemplate = $child;
            $happened = true;
        }
        else if (($xml->localName == 'field') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new \Gedcomx\Source\CitationField($xml);
            if (!isset($this->fields)) {
                $this->fields = array();
            }
            array_push($this->fields, $child);
            $happened = true;
        }
        else if (($xml->localName == 'value') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->value = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of SourceCitation from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'lang') && ($xml->namespaceURI == 'http://www.w3.org/XML/1998/namespace')) {
            $this->lang = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes the contents of this SourceCitation to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->lang) {
            $writer->writeAttribute('xml:lang', $this->lang);
        }
        parent::writeXmlContents($writer);
        if ($this->citationTemplate) {
            $writer->startElementNs('gx', 'citationTemplate', null);
            $this->citationTemplate->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->fields) {
            foreach ($this->fields as $i => $x) {
                $writer->startElementNs('gx', 'field', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->value) {
            $writer->startElementNs('gx', 'value', null);
            $writer->text($this->value);
            $writer->endElement();
        }
    }
}
