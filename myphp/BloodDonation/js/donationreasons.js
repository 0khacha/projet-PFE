// donationreasons.js

document.addEventListener('DOMContentLoaded', function () {
  const reasonsContent = document.getElementById('reasons-content');
  const reasonsSection = document.querySelector('.reasons-section');

  const reasonsData = [
      { title: 'Save Lives', description: 'Your blood donation can save up to three lives.' },
      { title: 'Community Impact', description: 'Contribute to the well-being of your community.' },
      { title: 'Health Benefits', description: 'Regular blood donation can have health benefits for the donor.' },
      { title: 'Emergency Preparedness', description: 'Ensure an adequate blood supply for emergencies and disasters.' },
      { title: 'Medical Treatments', description: 'Support patients undergoing surgeries, cancer treatments, and medical procedures.' },
      { title: 'Blood Disorders', description: 'Assist individuals with blood disorders such as anemia and hemophilia.' },
      { title: 'Maternal and Child Health', description: 'Provide blood for mothers and newborns during childbirth complications.' },
      { title: 'Research and Development', description: 'Contribute to ongoing medical research and advancements.' },
      // Add more reasons as needed
  ];

  // Populate the animated content
  reasonsData.forEach(reason => {
      const card = document.createElement('div');
      card.classList.add('reason-card');
      card.innerHTML = `<h3>${reason.title}</h3><p>${reason.description}</p>`;
      reasonsContent.appendChild(card);
  });

  // Activate animation when the DOM is ready
  reasonsSection.classList.add('active');
});
