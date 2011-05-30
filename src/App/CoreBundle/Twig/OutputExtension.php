<?php

namespace App\CoreBundle\Twig;

/**
 * Description of Output
 *
 * @author ouardisoft
 */

class OutputExtension extends \Twig_Extension {

   /**
    * Returns a list of global functions to add to the existing list.
    *
    * @return array An array of global functions
    */
    public function getFunctions()
    {
        return array(
            'tags' => new \Twig_Function_Method($this, 'getTags'),
            'count' => new \Twig_Function_Method($this, 'getCount'),
        );
    }

   /**
    * Returns unique tags
    *
    * @param ArrayCollection $posts
    * @return array
    */
    public function getTags($posts)
    {
	$tags = array();
        foreach ($posts as $post) {
		foreach ($post->getTag() as $tag)
			if (!in_array($tag, $tags))
				$tags[] = $tag;
	}
	return $tags;
    }

   /**
    * Returns count of items
    *
    * @param array $posts
    * @return integer
    */
    public function getCount($items)
    {
	return count($items);
    }

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName()
    {
        return 'output';
    }
}

?>
