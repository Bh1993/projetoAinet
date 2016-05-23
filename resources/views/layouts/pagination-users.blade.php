<div>
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li><a href="#">1</a></li>
            @if (count($users)>20)
            <li><a href="#">2</a></li>
            @endif
            @if (count($users)>40)
            <li><a href="#">3</a></li>
            @endif
            @if (count($users)>60)
            <li><a href="#">4</a></li>
            @endif
            @if (count($users)>80)
            <li><a href="#">5</a></li>
            @endif
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
