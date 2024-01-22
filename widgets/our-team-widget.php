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
        $this->add_control(
            'team_members',
            [
                'label' => __('Team Members', 'elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'member_name',
                        'label' => __('Member Name', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('John Doe', 'elementor'),
                    ],
                    [
                        'name' => 'member_position',
                        'label' => __('Member Position', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('CEO', 'elementor'),
                    ],
                    [
                        'name' => 'member_image',
                        'label' => __('Member Image', 'elementor'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'default' => [
                    [
                        'member_name' => __('John Doe', 'elementor'),
                        'member_position' => __('CEO', 'elementor'),
                        'member_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_layout',
            [
                'label' => __('Layout', 'elementor'),
            ]
        );

        // Add controls for layout options
        $this->add_control(
            'blocks_per_row_desktop',
            [
                'label' => __('Blocks Per Row (Desktop)', 'elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => __('1', 'elementor'),
                    '2' => __('2', 'elementor'),
                    '3' => __('3', 'elementor'),
                    '4' => __('4', 'elementor'),
                    '5' => __('5', 'elementor'),
                    '6' => __('6', 'elementor'),
                ],
            ]
        );

        $this->add_control(
            'blocks_per_row_tablet',
            [
                'label' => __('Blocks Per Row (Tablet)', 'elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1' => __('1', 'elementor'),
                    '2' => __('2', 'elementor'),
                    '3' => __('3', 'elementor'),
                    '4' => __('4', 'elementor'),
                    '5' => __('5', 'elementor'),
                    '6' => __('6', 'elementor'),
                ],
            ]
        );

        $this->add_control(
            'blocks_per_row_mobile',
            [
                'label' => __('Blocks Per Row (Mobile)', 'elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('1', 'elementor'),
                    '2' => __('2', 'elementor'),
                    '3' => __('3', 'elementor'),
                    '4' => __('4', 'elementor'),
                    '5' => __('5', 'elementor'),
                    '6' => __('6', 'elementor'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $team_members = $settings['team_members'];
        $blocks_per_row_desktop = $settings['blocks_per_row_desktop'];
        $blocks_per_row_tablet = $settings['blocks_per_row_tablet'];
        $blocks_per_row_mobile = $settings['blocks_per_row_mobile'];

        ?>
<div class="our-team-widget">
    <div class="team-rows">
        <?php
                foreach ($team_members as $index => $member):
                    $image_url = esc_url($member['member_image']['url']);
                    $member_name = esc_html($member['member_name']);
                    $member_position = esc_html($member['member_position']);
                    ?>
        <div class="team-member" style="flex-basis: calc(<?= 100 / $blocks_per_row_desktop ?>%);">
            <img src="<?php echo $image_url; ?>" alt="<?php echo $member_name; ?>">
            <div>
                <h3>
                    <?php echo $member_name; ?>
                </h3>
                <p>
                    <?php echo $member_position; ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
    }
}