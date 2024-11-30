<?php

namespace Bnomei;

trait HTMLHeadSnippets
{
    public function base(?string $href = null): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function link_alternates(array $urls = []): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function link_canonical(array $urls = []): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function link_css(array $files = []): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function link_preconnect(array $urls = []): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function link_prefetch(array $files = []): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function link_preload(array $files = []): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function meta_author(?string $content = null): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function meta_description(?string $content = null): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function meta_opengraph(?string $url = null, ?string $title = null, ?string $description = null, mixed $image = null): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function meta_robots(?string $content = null): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function recommended_minimum(): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function script_js(array $files = [], bool $async = false, bool $defer = false): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }

    public function title(?string $title = null): self
    {
        return $this->snip(__FUNCTION__, get_defined_vars());
    }
}
