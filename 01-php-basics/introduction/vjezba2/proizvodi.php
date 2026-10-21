<?php include "header.php"; ?>

        <main>
            <h2>Popis proizvoda</h2>

            <table>
                <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Kategorija</th>
                        <th>Količina</th>
                        <th>cijena</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laptop</td>
                        <td>Elektronika</td>
                        <td class="sredina">50</td>
                        <td class="valuta">1.200,00 €</td>
                    </tr>
                    <tr>
                        <td>Majica</td>
                        <td>Odjeća</td>
                        <td class="sredina">170</td>
                        <td class="valuta">25,00 €</td>
                    </tr>                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="zbroj">Ukupno:</td>
                        <td class="valuta zbroj">1.225,00 €</td>
                    </tr>
                </tfoot>
            </table>
            <p>
                <a href="unosproizvoda.php" class="gumb">Dodaj novi proizvod</a>
            </p>
        </main>

<?php include "footer.php"; ?>