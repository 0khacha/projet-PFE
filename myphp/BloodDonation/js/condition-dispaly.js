let currentSet = 1;
const totalSets = 2;

function showConditions() {
  const conditionSets = document.querySelectorAll('.condition-list');
  conditionSets.forEach((set, index) => {
    if (index + 1 === currentSet) {
      set.style.display = 'flex';
    } else {
      set.style.display = 'none';
    }
  });
}

function showNextConditions() {
  currentSet = (currentSet % totalSets) + 1;
  showConditions();
}

function showPreviousConditions() {
  currentSet = (currentSet - 2 + totalSets) % totalSets + 1;
  showConditions();
}

// Initial display of conditions
showConditions();
