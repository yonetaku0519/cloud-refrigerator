@if ($name !== "なし")
    <table class="table table-striped">
        <tbody>
            @foreach ($movie as $youtube)
                <tr>
                    <td>
                        <iframe id="ytplayer" type="text/html" width="320" height="180"
                          src={{ $youtube[0] }}
                          frameborder="0"></iframe>
                    </td>
                    <td>{{ $youtube[1]['title'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br>
@else

    
@endif