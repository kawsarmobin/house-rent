<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            @php
                function copyright($startYear)
                {
                    $currentYear = date('Y');
                    if ($startYear < $currentYear) {
                        $currentYear = date('y');
                        return "&copy; $startYear &ndash; $currentYear House Rent. All rights reserved.";
                    } else {
                        return "&copy; $startYear House Rent. All rights reserved.";
                    }
                }
                echo copyright(2019);
            @endphp
        </div>
    </div>
</footer>