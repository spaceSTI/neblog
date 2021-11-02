<div class="col">
    <h2>Облако тегов</h2>
    <p>
        @foreach($tagsWithWeights as $tag)
            <span style='font-size: {{ 80 + $tag->fontSize }}%'>{{ $tag->name }}</span>
        @endforeach
    </p>
</div>
