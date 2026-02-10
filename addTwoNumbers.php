<?php
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {

        // $l1 = $this->reverseList($l1);
        // $l2 = $this->reverseList($l2);

        $dummy = new ListNode(0);
        $current = $dummy;
        $carry = 0;

        while ($l1 !== null || $l2 !== null || $carry > 0) {

            $v1 = $l1 ? $l1->val : 0;
            $v2 = $l2 ? $l2->val : 0;

            $sum = $v1 + $v2 + $carry;

            $carry = intdiv($sum, 10);
            $digit = $sum % 10;

            $current->next = new ListNode($digit);
            $current = $current->next;

            if ($l1) $l1 = $l1->next;
            if ($l2) $l2 = $l2->next;
        }

        return $dummy->next;
    }

    function reverseList($head) {
        $prev = null;
        $current = $head;

        while ($current !== null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        return $prev;
    }
}?>