<?php
    $plant_name = $plant_name ?? 'default_plant_name'; 
?>
<div style="width: 30vw; border: 1px solid #ddd; border-radius: 8px; background-color: #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px; margin-bottom: 30px;">
    <h3 style="margin: 0; font-size: 1.5em; color: #333; border-bottom: 1px solid #ddd; padding-bottom: 10px; text-align: center;">Comments</h3>
    <div class="comments" style="max-height: 200px; overflow-y: auto; padding-right: 5px;">
        <?php
            include 'config.php';
            $sql = "SELECT username, created_at, message FROM chat_messages WHERE plant_name = ? ORDER BY id DESC";
            $stmt = $connection->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("s", $plant_name);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $created_at = date('d-M-Y g:i A', strtotime($row['created_at']));
                        echo '<p style="margin: 15px 0; padding: 10px; background-color: #f1f1f1; border-radius: 6px; font-size: 1em;">
                            <strong style="color:blue";>' . htmlspecialchars($row['username']) . '</strong>
                            <small style="padding-bottom: 5px;">' . htmlspecialchars($created_at) . '</small><br>
                            ' . htmlspecialchars($row['message']) . '
                        </p>';
                    }
                } else {
                    echo "<p>No comments found.</p>";
                }
                $stmt->close();
            } else {
                echo "<p>Error in query: " . $connection->error . "</p>";
            }
        ?>
    </div>
    <form action="./add_chat_messages.php" method="post" id="chatForm">
        <div style="margin-top: 20px;">
            <input type="hidden" id="plant_name" name="plant_name" value="<?php echo htmlspecialchars($plant_name); ?>">
            <textarea required style="width: 90%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 1em; min-height: 60px;" placeholder="Write a comment..." name="message"></textarea>
            <button type="submit" style="margin-top: 10px; padding: 10px 20px; background-color: #5444B5; color: white; border: none; border-radius: 6px; cursor: pointer;">
                Submit Comment
            </button>
        </div>
    </form>
</div>