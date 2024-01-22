<?php

class Our_Team_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'our-team-widget';
    }

    public function get_title()
    {
        return 'Our Team';
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {
        // Widget controls
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Team Members', 'elementor'),
            ]
        );

        // Add controls for team member details

        $this->end_controls_section();

        $this->start_controls_section(
            'section_layout',
            [
                'label' => __('Layout', 'elementor'),
            ]
        );

        // Add controls for layout options

        $this->end_controls_section();
    }

    protected function render()
    {
        // Widget HTML output
        ?>
<div class="our-team-widget">
    <!-- Render team members dynamically based on user inputs -->
</div>
<?php
    }
}