<?php

namespace JiraRestApi\Issue;

/**
 * Issue Transition mapping class.
 */
class Transition implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var \JiraRestApi\Issue\TransitionTo */
    public $to;

    /** @var array */
    public $fields;

    /** @var \JiraRestApi\Issue\IssueField */
    public $issueFields;

    /** @var array */
    public $transition;

    /** @var array */
    public $update;

    public bool $isConditional;

    public bool $isLooped;

    public bool $hasScreen;

    public bool $isGlobal;

    public bool $isAvailable;

    public bool $isInitial;

    public function setTransitionName($name)
    {
        if (is_null($this->transition)) {
            $this->transition = [];
        }

        $this->transition['name'] = $name;
    }

    /**
     * set none translated transition name.
     *
     * @param string $untranslatedName
     */
    public function setUntranslatedName(string $untranslatedName)
    {
        if (is_null($this->transition)) {
            $this->transition = [];
        }

        $this->transition['untranslatedName'] = $untranslatedName;
    }

    public function setTransitionId($id)
    {
        if (is_null($this->transition)) {
            $this->transition = [];
        }

        $this->transition['id'] = $id;
    }

    public function setCommentBody($commentBody)
    {
        if (is_null($this->update)) {
            $this->update = [];
            $this->update['comment'] = [];
        }

        $ar = [];
        $ar['add']['body'] = $commentBody;
        array_push($this->update['comment'], $ar);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
