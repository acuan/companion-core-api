class ContentStateService
{
    public function update(
        Content $content,
        array $fixture
    )
    {
        $content
            ->state()
            ->updateOrCreate(
                [],
                [
                    'current_state' => [

                        'minute' =>
                            $fixture['fixture']['status']['elapsed'],

                        'score_home' =>
                            $fixture['goals']['home'],

                        'score_away' =>
                            $fixture['goals']['away'],

                        'status' =>
                            $fixture['fixture']['status']['short']
                    ]
                ]
            );
    }
}