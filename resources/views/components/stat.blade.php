<div class="bg bg-light">

  <b>Stat:</b>
                                    <ul style="font-size: 20px;">
                                  
                                      @foreach($stat as $stat)
                                      <li>Awaiting Members -  {{$stat["level0"]}}</li>
                                      <li>Level 1 -  {{$stat["level1"]}}</li>
                                      <li>Level 2 -  {{$stat["level2"]}}</li>
                                      <li>Level 3 -  {{$stat["level3"]}}</li>
                                      <li>Level 4 -  {{$stat["level4"]}}</li>
                                      <li>Level 5 -  {{$stat["level5"]}}</li>
                                      <li>Level 6 -  {{$stat["level6"]}}</li>
                                      <li>Level 7 -  {{$stat["level7"]}}</li>
                                      @endforeach
                                    </ul>
</div>
