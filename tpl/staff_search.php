<main>
    <h1 class="page-title">Ticket Search</h1>
    <div class="content">
        <form id="search">
            <label for="ticket">Search by Ticket ID:</label>
            <input id="ticket" name="id" type="text" placeholder="Ticket ID" />
            <hr />
            <label for="email">Search by Email Address:</label>
            <input id="email" name="email" type="email" placeholder="Email Address" />

            <div class="split">
                <div>
                    <label for="sortBy">Sort By:</label>
                    <select id="sortBy" name="orderBy">
                        <option value="9" selected>Ticket Status</option>
                        <option value="10">Date</option>
                    </select>
                </div>
                <div>
                    <label for="ascDesc">Order:</label>
                    <select id="ascDesc" name="ascdesc">
                        <option value="1" selected>Ascending</option>
                        <option value="0">Descending</option>
                    </select>
                </div>
            </div>
            <hr />

            <input type="submit" value="Search" class="btn" />
        </form>
    </div>
</main>

<main>
    <h1 class="page-title">Search results for: Nothing</h1>
    <div class="content">
        <div class="table">
            <div class="head">
                <div>Student</div>
                <div>Email Address</div>
            </div>
            <div class="body">
                <div>Ayyy</div>
                <div>Ayyy</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
            <div class="body">
                <div>Ayy boi</div>
                <div>Here come dat boi</div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../tpl/staff_footer.php'); ?>
<script>
    $(document).ready(function() {
        $(document).on('submit', '#search', function(e)
        {
            e.preventDefault();

            $.ajax({
                type : 'POST',
                dataType : 'JSON',
                url : '../ajax/admin_ticket_search.php',
                data : $("#search").serialize(),
                success : function(data) {
                    console.log(data);
                }
            });

            return false;
        });
    });
</script>
