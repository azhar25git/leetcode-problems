// https://leetcode.com/problems/two-sum/
class Solution {
    public int[] twoSum(int[] nums, int target) {
        // O(n^2) solution
        // for(int i=0; i<nums.length; i++) {
        //     for(int j=i+1; j<nums.length; j++) {
        //         if(nums[i]+nums[j] == target) {
        //             return new int[]{i, j};
        //         }
        //     }
        // }

        // return nums;
        // O(n) solution
        Map<Integer, Integer> complementsMap = new HashMap<>();
        for(int i=0; i<nums.length; i++) {
            Integer compIndex = complementsMap.get(nums[i]);
            if(compIndex != null) {
                return new int[]{i, compIndex};
            }
            complementsMap.put(target-nums[i], i);
        }

        return nums;
    }
}
