<?php

  if(
    isset($_PATCH['id']) &&
    isset($_PATCH['message'])
  ) {
    UpdateCartMessage(
      $_PATCH['id'],
      $_PATCH['message']
    );

    echo "Message updated";
  }

  elseif(
    isset($_PATCH['id']) &&
    isset($_PATCH['seat_number'])
  ) {
    UpdateCartSeatNumber(
      $_PATCH['id'],
      $_PATCH['seat_number']
    );

    echo "Seat number updated";
  }

  elseif(
    isset($_PATCH['id']) &&
    isset($_PATCH['total_price'])
  ) {
    UpdateCartTotalPrice(
      $_PATCH['id'],
      $_PATCH['total_price']
    );

    echo "Total price updated";
  }

?>